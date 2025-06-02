<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--DNS prefetch(2022/6/28 時代遅れ？いれつつ不要は削除)-->
<meta http-equiv="x-dns-prefetch-control" content="on">
<!--google analytics, Googleタグマネージャー-->
<link rel='preconnect dns-prefetch' href="//www.googletagmanager.com">
<link rel='preconnect dns-prefetch' href="//www.google-analytics.com">
<!--Adsense-->

<!--Bing Webmaster tools-->
<meta name="msvalidate.01" content="E9968BAC09E30541CFEB88C97E674710" >
<!--Twitter-->
<link rel="dns-prefetch" href="//twitter.com">
<link rel="dns-prefetch" href="//cdn.api.twitter.com">
<link rel="dns-prefetch" href="//p.twitter.com">
<link rel="dns-prefetch" href="//platform.twitter.com">

<!--end.DNS prefetch-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- link(rel="stylesheet", href="https://cdn.simplecss.org/simple.min.css")-->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lib/simple.min.css">


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/layout.css?u=22614">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/header.css?u=241008">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/footer.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/util.css?u=20240524">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/common.js?up=0327"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>
<?php get_template_part( 'inc/head_setpage' ) ;?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lib/fontawesome-free-6.2.1-web/css/all.min.css">
<?php wp_head();?>
<!-- InMobi Choice. Consent Manager Tag v3.0 (for TCF 2.2) -->
<script type="text/javascript" async=true>
(function() {
  var host = "www.themoneytizer.com";
  var element = document.createElement('script');
  var firstScript = document.getElementsByTagName('script')[0];
  var url = 'https://cmp.inmobi.com'
    .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js?tag_version=V3');
  var uspTries = 0;
  var uspTriesLimit = 3;
  element.async = true;
  element.type = 'text/javascript';
  element.src = url;

  firstScript.parentNode.insertBefore(element, firstScript);

  function makeStub() {
    var TCF_LOCATOR_NAME = '__tcfapiLocator';
    var queue = [];
    var win = window;
    var cmpFrame;

    function addFrame() {
      var doc = win.document;
      var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

      if (!otherCMP) {
        if (doc.body) {
          var iframe = doc.createElement('iframe');

          iframe.style.cssText = 'display:none';
          iframe.name = TCF_LOCATOR_NAME;
          doc.body.appendChild(iframe);
        } else {
          setTimeout(addFrame, 5);
        }
      }
      return !otherCMP;
    }

    function tcfAPIHandler() {
      var gdprApplies;
      var args = arguments;

      if (!args.length) {
        return queue;
      } else if (args[0] === 'setGdprApplies') {
        if (
          args.length > 3 &&
          args[2] === 2 &&
          typeof args[3] === 'boolean'
        ) {
          gdprApplies = args[3];
          if (typeof args[2] === 'function') {
            args[2]('set', true);
          }
        }
      } else if (args[0] === 'ping') {
        var retr = {
          gdprApplies: gdprApplies,
          cmpLoaded: false,
          cmpStatus: 'stub'
        };

        if (typeof args[2] === 'function') {
          args[2](retr);
        }
      } else {
        if(args[0] === 'init' && typeof args[3] === 'object') {
          args[3] = Object.assign(args[3], { tag_version: 'V3' });
        }
        queue.push(args);
      }
    }

    function postMessageEventHandler(event) {
      var msgIsString = typeof event.data === 'string';
      var json = {};

      try {
        if (msgIsString) {
          json = JSON.parse(event.data);
        } else {
          json = event.data;
        }
      } catch (ignore) {}

      var payload = json.__tcfapiCall;

      if (payload) {
        window.__tcfapi(
          payload.command,
          payload.version,
          function(retValue, success) {
            var returnMsg = {
              __tcfapiReturn: {
                returnValue: retValue,
                success: success,
                callId: payload.callId
              }
            };
            if (msgIsString) {
              returnMsg = JSON.stringify(returnMsg);
            }
            if (event && event.source && event.source.postMessage) {
              event.source.postMessage(returnMsg, '*');
            }
          },
          payload.parameter
        );
      }
    }

    while (win) {
      try {
        if (win.frames[TCF_LOCATOR_NAME]) {
          cmpFrame = win;
          break;
        }
      } catch (ignore) {}

      if (win === window.top) {
        break;
      }
      win = win.parent;
    }
    if (!cmpFrame) {
      addFrame();
      win.__tcfapi = tcfAPIHandler;
      win.addEventListener('message', postMessageEventHandler, false);
    }
  };

  makeStub();

  var uspStubFunction = function() {
    var arg = arguments;
    if (typeof window.__uspapi !== uspStubFunction) {
      setTimeout(function() {
        if (typeof window.__uspapi !== 'undefined') {
          window.__uspapi.apply(window.__uspapi, arg);
        }
      }, 500);
    }
  };

  var checkIfUspIsReady = function() {
    uspTries++;
    if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
      console.warn('USP is not accessible');
    } else {
      clearInterval(uspInterval);
    }
  };

  if (typeof window.__uspapi === 'undefined') {
    window.__uspapi = uspStubFunction;
    var uspInterval = setInterval(checkIfUspIsReady, 6000);
  }
})();
</script>
<!-- End InMobi Choice. Consent Manager Tag v3.0 (for TCF 2.2) -->
</head><body>