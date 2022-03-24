# tracking.js
simple self-hosting tracker library in javascript

## Installation
1. Upload files to your server
2. Edit them and adjust relative paths
3. Import DB Structure
4. Include script to your project
5. You are done

## How to use
Embed the following code into your footer  
*Compressed:*
```html
<!-- Begin Visitor Count -->
    <script id="vc-src" src="PATH_TO_YOUR_CWD/visitorjs/ajax.js"></script>
    <script id="ajax-src" src="PATH_TO_YOUR_CWD/visitorjs/visitor.js"></script>
    <script type="text/javascript">let counter=new VisitorCounter("exact_loc",function(e){console.log(e)});counter.make();</script>
<!-- End Visitor Count -->
```
*Fullscale:*
```html
<!-- Begin Visitor Count -->
  <script id="vc-src" src="PATH_TO_YOUR_CWD/visitorjs/ajax.js"></script>
  <script id="ajax-src" src="PATH_TO_YOUR_CWD/visitorjs/visitor.js"></script>
  <script type="text/javascript">
      // initialize counter
      let counter = new VisitorCounter('exact_loc', function(data) { console.log(data); });

      // start counting
      counter.make();
  </script>
<!-- End Visitor Count -->
```
  
In Case you want to display the current visitor count, use ``.useContainer()``
before you call ``.make()``. Read more about that below.

## VisitorCounter Settings

```js
new VisitorCounter(LOCATION, CALLBACK, TEST);
```

@param {string} ``LOCATION``: exact_loc | host_only  
> Track the exact location or the hostname  
> (e.g track https://www.google.com instead of https://www.google.com/search?q=a)  

@param {callback} ``CALLBACK``: any function, receives server reply as ``data``   
> Callback Function for Ajax Call to backend API
> which receives an argument called 'data' containing the server's
> answer

@param {boolean} ``TEST``: true | false  
> Enable this to prevent database spam when
> working on the tracked site. This option will disable
> actual tracking

## Containments Settings

```js
myCounter.useContainer(ELEMENT);
```

@param {external:Node} ``ELEMENT``: null | any node
> Pass this in case you want to use an own container element. If you
> leave it empty, it will fallback to standard element with id 'visitor-count'.
