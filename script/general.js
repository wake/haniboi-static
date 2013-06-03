  

  var oldOnload = window.onload ? window.onload : (function () { return; });

  window.onload = function () {

    oldOnload.apply (this, arguments);

    /* Load in Copy right Login event */
    var bcb = document.getElementById ('bottomCopyrightBlock');

    if (bcb) {
      bcb.onclick = function () {
        window.location = './administrator/';
        //location.href ('./administrator/');
      };
    }

    /* Load in Product Terms And Conditions Popup window */
    var tAndCRefLink = document.getElementById ('tAndCRefLink');

    if (tAndCRefLink) {
      tAndCRefLink.onclick = function () {
        window.open('./?view=tAndCPopup','TACPopup','channelmode=0, directories=1, fullscreen=0, height=750, location=1, menubar=1, resizable=1, scrollbars=1, status=1, titlebar=1, toolbar=1, top=10, width=750');
        return false;
      };
    }

    /* Load in Product Terms And Conditions Popup window */
    var featureContainer = document.getElementById ('featureContainer');

    if (featureContainer) {
      featureLinks = featureContainer.getElementsByTagName ('a');
      featureLinkLength = featureLinks.length;

      for (i=0; i<featureLinkLength; i++) {
        if (featureLinks[i].getAttribute ('rel').match ('popup')) {
          featureLinks[i].onclick = function () {
            window.open('./?view=featureBook&fid=' + this.getAttribute ('rel').split('#')[1], 'FeaturePopup','fullscreen=0, height=606, location=0, menubar=0, resizable=0, scrollbars=0, status=0, titlebar=0, toolbar=0, width=806');
            return false;
          };
        }
      }
    }
  }