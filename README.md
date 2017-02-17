# neos-ajax-form
A Neos CMS package to load and submit forms with ajax

## Installation
Add the package in your site package composer.json

```
"require": {
  "obisconcept/neos-ajax-form": "~2.0.0"
}
```

## Requirements
The package requires jQuery which is not provided within.

By default the standard form node type provided by Neos CMS will be removed. If you want to use both at the same time remove the constraint from the default content collection in your NodeTypes.yaml

```
'Neos.Neos:ContentCollection':
  constraints:
    nodeTypes:
      'Neos.Neos.NodeTypes:Form': TRUE
```
