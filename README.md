# Laravel wrapper for Get A Newsletter's API

This package uses Get A Newsletter's API version 3.0.
Read the official docs at [https://api.getanewsletter.com/v3/docs/](https://api.getanewsletter.com/v3/docs/) for information about the API and possible params/arguments.


- [Installation](#installation)
- [Methods](#methods)
  - [Contacts](#contacts)
  - [E-mails](#emails)
  - [Lists](#lists)
  - [Attributes](#attributes)
  - [Subscriptions](#subscriptions)
  - [Reports](#reports)
    - [Opened](#opened)
    - [Non-opened](#non-opened)
    - [Bounces](#bounces)
    - [Links](#links)
    - [Clicks](#clicks)
    - [Unsubscriptions](#unsubscriptions)
  - [To do](#todo)

## <a name="installation"></a>Installation

Right now, since this isn't added to Packagist yet, this can be installed by adding the following to your `composer.json`:
```php
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/MartinCamen/laravel-getanewsletter"
    }
],
```

And adding this to the require section:
```php
"martincamen/laravel-getanewsletter": "dev-master"
```

Publish the config file by running:
```php
php artisan vendor:publish --provider="MartinCamen\GetANewsletter\GetANewsletterServiceProvider" --tag="config"
```

Get an authentication token from Get A Newsletter and set it in the config file or in the `.env` file and you're ready to go!

## <a name="methods"></a>Methods

*Almost all* of the following modules' `get()` methods are handled the same.

The `get()` method takes two arguments:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| Array | Optional params (see [the docs](https://api.getanewsletter.com/v3/docs) for all possibilities) | `[]` |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

Get all results for a specific module:
```php
GetANewsletter::contacts()->get();

GetANewsletter::lists()->get();
    
// ...and so on.
```

With params:
```php
GetANewsletter::contacts()->get(['page' => 1], false);

GetANewsletter::lists()->get(['page' => 1], false);   
    
// ...and so on.
```

**The exceptions** are (for example) the submethods of `Reports` which takes `$reportId` as its first argument and sometimes another related `id` field as its second argument. The arguments mentioned above are then pushed to the second or third position and then following the same standard.

### <a name="contacts"></a>Contacts
Get all contacts:
```php
GetANewsletter::contacts()->get();
```

Create a new contact:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | The e-mail to store | - |
| Array | Optional params (see [the docs](https://api.getanewsletter.com/v3/docs) for all possibilities) | `[]` |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::contacts()->create($email, $additionalData, false);
```

Update a contact:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | The e-mail to handle | - |
| Array | Optional params to update (see [the docs](https://api.getanewsletter.com/v3/docs) for all possibilities). Non-mentioned params will not be updated. | `[]` |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::contacts()->update($email, $additionalData, false);
```

Delete a contact (pass the e-mail `(string)` to delete):

```php
GetANewsletter::contacts()->delete($email);
```


### <a name="emails"></a>E-mails
Get all e-mails (sent and drafts):
```php
GetANewsletter::emails()->get();
```

### Drafts &amp; Sent e-mails
Get all drafts/sent:
```php
GetANewsletter::drafts()->get();

GetANewsletter::sent()->get();
```

To get a specific e-mail, use the `find()` method with the appropriate ID (will return as a collection, pass `false` as a second argument if you want the raw response):
```php
GetANewsletter::drafts()->find($id);

GetANewsletter::sent()->find($id, false);
```

Delete a draft/sent (pass the item's id `(int)` to delete):

```php
GetANewsletter::drafts()->delete($id);
GetANewsletter::sent()->delete($id);
```


Create a new draft:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| Array | Params. Required params are `subject` &amp; `body`. | - |
| Boolean | Get the result as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::drafts()->create($data, false);
```


Update a draft:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | The draft's id. | - |
| Array | Params to update. Non-mentioned params will not be updated. | `[]` |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::drafts()->update($id, $additionalData, false);
```


Copy a draft (pass the draft's id `(int)` to copy, the second param is whether the result should be a collection or not):

```php
GetANewsletter::drafts()->copy($id, false);
```


### <a name="lists"></a>Lists
Get all lists:
```php
GetANewsletter::lists()->get();
```

Create a new list:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| Array | Params. Required params are `email`, `name` &amp; `sender`. | - |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::lists()->create($data, false);
```

Update a list:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | The list's hash. | - |
| Array | Params to update. Non-mentioned params will not be updated. | `[]` |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::lists()->update($hash, $additionalData, false);
```


Delete a list (pass the list's hash `(string)` to delete):

```php
GetANewsletter::lists()->delete($hash);
```

### <a name="attributes"></a>Attributes
Get all attributes:
```php
GetANewsletter::attributes()->get();
```

Create a new attribute:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | Name, required. | - |
| Array | Params. Required params are `name` &amp; `sender`. | - |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::attributes()->create($name, $data, false);
```

Update an attribute:

| Type | Description | Default |
| ------------- | ------------- |  ------------- | 
| String | The name to change to. This is the only value that can be changed. | - |
| String | Code of the attribute to update. | - |
| Boolean | Get the results as a collection, `false` will return the raw response (including the count, the results, etc.) | `true` |

```php
GetANewsletter::attributes()->update($name, $code, false);
```


Delete an attribute (pass the attribute's code `(string)` to delete):

```php
GetANewsletter::attributes()->delete($code);
```


### <a name="subscriptions"></a>Subscriptions
Get all subscriptions:
```php
GetANewsletter::subscriptions()->get();
```


### <a name="reports"></a>Reports
Get all reports:
```php
GetANewsletter::reports()->get();
```

To get a specific report, use the `find()` method with the appropriate ID (will return as a collection, pass `false` as a second param if you want the raw response):
```php
GetANewsletter::reports()->find($id);

GetANewsletter::reports()->find($id, false);
```

#### <a name="opened"></a>Opened
Get all opened for a specific report:
```php
GetANewsletter::opened()->get($reportId);
```

Get information regarding a specific open for a specific report (pass `false` as a third param if you want the raw response):
```php
GetANewsletter::opened()->find($reportId, $openId);
```

Get an aggregated report regarding a specific report:
```php
GetANewsletter::opened()->aggregated($reportId);
```

#### <a name="non-opened"></a>Non-opened
Get all non-opened for a specific report:
```php
GetANewsletter::nonOpened()->get($reportId);
```

Get information regarding a specific non-open for a specific report (pass `false` as a third param if you want the raw response):
```php
GetANewsletter::nonOpened()->find($reportId, $nonOpenedId);
```

#### <a name="bounces"></a>Bounces
Get all bounces for a specific report:
```php
GetANewsletter::bounces()->get($reportId);
```

Get information regarding a specific bounce for a specific report (pass `false` as a third param if you want the raw response):
```php
GetANewsletter::bounces()->find($reportId, $bounceId);
```

#### <a name="links"></a>Links
Get information regarding all links and data regarding clicks for a specific report:
```php
GetANewsletter::links()->get($reportId);
```

Get information regarding a specific link for a specific report (pass `false` as a third param if you want the raw response):
```php
GetANewsletter::links()->find($reportId, $linkId);
```

#### <a name="clicks"></a>Clicks
Get information regarding clicks for a specific report and link:
```php
GetANewsletter::links()->get($reportId, $linkId);
```

Get information regarding a specific click for a specific report and link (pass `false` as a fourth param if you want the raw response):
```php
GetANewsletter::links()->find($reportId, $linkId, $clickId);
```

#### <a name="unsubscriptions"></a>Unsubscriptions
Get information regarding all unsubscriptions for a specific report:
```php
GetANewsletter::unsubscriptions()->get($reportId);
```

Get information regarding a specific unsubscription for a specific report (pass `false` as a second param if you want the raw response):
```php
GetANewsletter::unsubscriptions()->find($reportId);
```

---

### <a name="todo"></a>To do
- Add all endpoints (including exports)
- Error handling
- ...and more.
