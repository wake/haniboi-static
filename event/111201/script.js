

  $(document).ready (function () {

    var eventEnable = false;

    // show form
    /*
    $('#floating-comera a').click (function () {

      if (! eventEnable) {

        eventEnable = true;

        var dw = $(document).width (), dh = $(document).height ();

        $('#floating-cover').css ({width: dw, height: dh, left: - parseInt ((dw - 803) / 2), opacity: 0}).animate ({opacity: .7}, function () {

          $('#floating-panel').css ({width: 801, height: 491, left: parseInt ((803 - 801) / 2), top: parseInt ((dh - 491) / 2)}).load ('event/111201/form.php', function () {

            var f = $('#floating-panel');

            f.find ('a.confirm').click (function () {

              var o = $(this), mi = $('img', o);

              o.data ('checked', o.data ('checked') ? false : true);

              mi.attr ('src', o.data ('checked') ? mi.attr ('src').replace ('_un', '') : mi.attr ('src').replace ('.gif', '_un.gif'));

              f.find ('#confirm-' + o.data ('mark')).val (o.data ('checked') ? 1 : 0);

            }).click (false).end ()

            // form submit
            .find ('a.submit').click (function () {

              $('form', f).trigger ('submit');

            }).click (false).end ()


            // change date - year
            .find ('select#year').change (function () {

              date = (new Date);
              line = {y: date.getFullYear (), m: date.getMonth (), d: date.getDate ()};

              option = '';

              end = $(this).val () == line.y ? line.m : 12;

              for (i=1; i<=end; i++)
                option += '<option value="' + i + '">' + i + '</option>';

              $('#month').html (option);

              option = '';

              linedate = new Date ();
              linedate.setFullYear ($(this).val ());
              linedate.setMonth ($('#month').val ());
              linedate.setDate (0);

              end = ($(this).val () == line.y && ($('#month').val () - 1) == line.m) ? line.d : linedate.getDate ();

              for (i=1; i<=end; i++)
                option += '<option value="' + i + '">' + i + '</option>';

              $('#day').html (option);

            }).end ()


            // change date - month
            .find ('select#month').change (function () {

              date = (new Date);
              line = {y: date.getFullYear (), m: date.getMonth (), d: date.getDate ()};

              option = '';

              linedate = new Date ();
              linedate.setFullYear ($('#year').val ());
              linedate.setMonth ($(this).val ());
              linedate.setDate (0);

              end = ($('#year').val () == line.y && ($(this).val () - 1) == line.m) ? line.d : linedate.getDate ();

              for (i=1; i<=end; i++)
                option += '<option value="' + i + '">' + i + '</option>';

              $('#day').html (option);

            }).end ()


            // handle form
            .find ('form').submit (function () {

              if ($('#photo').val () == '') {
                alert ('Please select upload file');
                return false;
              }

              else if ($('#email').val () == '') {
                alert ('Please fill your email address');
                return false;
              }

              else if ($('#place').val () == '') {
                alert ('Please fill your token place');
                return false;
              }

              else if ($('#first-name').val () == '') {
                alert ('Please fill your first name');
                return false;
              }

              else if ($('#last-name').val () == '') {
                alert ('Please fill your last name');
                return false;
              }

              if (f.find ('#confirm-a').val () <= 0) {
                alert ('Please confirm the clause');
                return false;
              }

              else if (f.find ('#confirm-b').val () <= 0) {
                alert ('Please confirm the clause');
                return false;
              }

              else if (f.find ('#confirm-c').val () <= 0) {
                alert ('Please confirm the clause');
                return false;
              }

              $(this).find ('a.submit').html ('<img src="event/111201/images/20-1.gif" style="padding: 40px 0 0 40px;">').unbind ('click').click (false);

              $(this).ajaxSubmit ({ 
                url:      'event/111201/handle.php', 
                success:  function (responseText) { 
                  alert (responseText);
                  alert ('Thanks for your upload!'); 
                  location.href = './?v=top&c=photos';
                } 
              });

              return false;
            });

          });

        }).click (function () {

          if (eventEnable) {

            eventEnable = false;

            $('#floating-panel').html ('').css ({width: 0, height: 0});;

            $('#floating-cover').animate ({opacity: 0}, function () {

              $(this).css ({width: 0, height: 0, opacity: 0});

            });
          }
        });

      } // if eventEnable

      else {

        eventEnable = false;

        $('#floating-panel').html ('').css ({width: 0, height: 0});;

        $('#floating-cover').animate ({opacity: 0}, function () {

          $(this).css ({width: 0, height: 0, opacity: 0});

        });

      }

    }).click (false);
    */


/*


    photoEnable = false;

    $('.photo-block').mouseenter (function () {

      if (! $(this).data ('enter')) {
        $(this).data ('enter', true);
        $(this).find ('.photo-label').fadeIn ('fast');
      }

    }).mouseleave (function () {

      if ($(this).data ('enter')) {
        $(this).data ('enter', false);
        $(this).find ('.photo-label').fadeOut ('fast');
      }

    }).click (function () {

      o = $(this);

      photoEnable = true;

      var dw = $(document).width (), dh = $(document).height ()
        , ww = $(window).width (), wh = $(window).height (), wstop = $(window).scrollTop ();

      $('#floating-cover').css ({width: dw, height: dh, left: - parseInt ((dw - 803) / 2), opacity: 0}).animate ({opacity: .7}, function () {

        $('#floating-panel').css ({width: 601, height: 486, left: parseInt ((803 - 601) / 2), top: wstop + parseInt ((wh - 486) / 2)}).load ('event/111201/show.php?id=' + o.data ('id'), loadPanel);

      }).click (function () {

        photoEnable = false;

        $('#floating-panel').html ('').css ({width: 0, height: 0});

        $('#floating-cover').animate ({opacity: 0}, function () {

          $(this).css ({width: 0, height: 0, opacity: 0});

        });

      });

    });


    function loadPanel () {
      $('.fb-box').each (function () {
        $(this).append ($('#fb-' + $(this).data ('pid')).css ('display', 'block'));
      })
      $('#close-photo').click (closePanel).click (false);
      $('a.photo-prev').click (function () { loadPhoto ($(this)); }).click (false);
      $('a.photo-next').click (function () { loadPhoto ($(this)); }).click (false);
    }

    function loadPhoto (o) {

      $('#floating-panel').load ('event/111201/show.php?id=' + o.data ('id'), function () {

        $('#close-photo').click (closePanel).click (false);
        $('a.photo-prev').click (function () { loadPhoto ($(this)); }).click (false);
        $('a.photo-next').click (function () { loadPhoto ($(this)); }).click (false);
      });
    }

    function closePanel () {

      photoEnable = false;

      $('#floating-panel').html ('').css ({width: 0, height: 0});

      $('#floating-cover').animate ({opacity: 0}, function () {

        $(this).css ({width: 0, height: 0, opacity: 0});

      });

    }
*/

    $('.photo-block').mouseenter (function () {

      if (! $(this).data ('enter')) {
        $(this).data ('enter', true);
        $(this).find ('.photo-label').fadeIn ('fast');
      }

    }).mouseleave (function () {

      if ($(this).data ('enter')) {
        $(this).data ('enter', false);
        $(this).find ('.photo-label').fadeOut ('fast');
      }

    });

    $('.photo-block').fancybox({width: 660, minHeight: 660, scrolling: 'no', closeBtn: false, type: 'iframe'});

  });