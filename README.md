# neos-ajax-form
A Neos CMS package to load and submit forms with ajax

## Installation
Add the package in your site package composer.json

```
"require": {
  "obisconcept/neos-ajax-form": "~1.0.0"
}
```

## Requirements
The package requires jQuery which is not provided within.

## Usage
Add the subroute to the `Routes.yaml` of the Flow application

```
-
  name: 'AjaxForm'
  uriPattern: '<AjaxFormSubroutes>'
  subRoutes:
    'AjaxFormSubroutes':
      package: 'ObisConcept.NeosAjaxForm'
```

By default the standard form node type provided by Neos CMS will be removed. If you want to use both at the same time remove the constraint from the default content collection in your NodeTypes.yaml

```
'TYPO3.Neos:ContentCollection':
  constraints:
    nodeTypes:
      'TYPO3.Neos.NodeTypes:Form': TRUE
```
