document.addEventListener("DOMContentLoaded", function () {

    var confirm_exit = function(e){
        e = e || window.event;
        var message = "You have unsaved changes. Are you sure you want to leave this page?";
        if (e)
        {
            e.returnValue = message;
        }

        return message;
    };

    window.onbeforeunload = null;

  OpenEyes.Dialog.init(
    document.getElementById('dialog-container'),
    document.getElementById('refresh-button'),
    'Are you sure?',
    'This will update the record to match the current status of the patient. If you are unsure do not continue.'
  );

  $('#js-wb3-openclose-actions').on('click', function() {
      let actions = $('.wb3-actions');
      if ($(actions).hasClass('down')) {
          // Show the actions bar.
          $(actions).removeClass('down');
          $(actions).addClass('up');
          $(this).removeClass('up');
          $(this).addClass('close');
      } else {
          // Hide the actions bar.
          $(actions).removeClass('up');
          $(actions).addClass('down');
          $(this).removeClass('close');
          $(this).addClass('up');
      }
  });

  $('#exit-button').on('click', function (event) {
    event.preventDefault();
    window.close();
  });

  function toggleEdit(card) {
      $(card).find('.edit-widget-btn i').toggleClass('pencil tick');
      let wbData = $(card).children('.wb-data');
      wbData.find('ul').toggle();
      wbData.find('.edit-widget').toggle();
  }

  $('.edit-widget-btn').on('click', function() {
      var card = $(this).parent().parent();
      if ($('.oe-i',this).hasClass('tick')) {
          var icon = this;
          var cardTitle = $(this).parent().text().trim();
          var $cardContent = $(this).parent().parent().find('.wb-data');
          var whiteboardEventId = icon.dataset.whiteboardEventId;
          var data = {};
          var contentId;
          var text;

          contentId = (cardTitle === 'Equipment') ? 'predicted_additional_equipment' : cardTitle.toLowerCase();
          text = $cardContent.find('textarea').val();
          data[contentId] = text;
          data.YII_CSRF_TOKEN = YII_CSRF_TOKEN;
          // Save the changes made.
          $.ajax({
              'type': 'POST',
              'url': '/OphTrOperationbooking/whiteboard/saveComment/' + whiteboardEventId,
              'data': data,
              'success': function () {
                  let newContent = text.split("\n");
                  $cardContent.find('ul').empty();
                  newContent.forEach(function(item) {
                      $cardContent.find('ul').append('<li>' + item + '</li>');
                  });
                  toggleEdit(card);
                  window.onbeforeunload = null;
              },
              'error': function () {
                  alert('Something went wrong, please try again.');
              }
          });
      } else {
          toggleEdit(card);
      }
  });

  $('.editable').find('.material-icons').on('click', function () {
    var icon = this;
    var $cardContent = $(icon).parents('.editable').find('.mdl-card__supporting-text');
    var whiteboardEventId = icon.dataset.whiteboardEventId;
    var textArea;
    var data = {};
    var contentId;
    var text;

    if (icon.textContent !== 'done') {
      textArea = $('<textarea />');
      icon.textContent = 'done';
      textArea[0].value = $cardContent.get(0).textContent.trim();
      $cardContent.html(textArea);
      window.onbeforeunload = confirm_exit;
    } else {
      contentId = $cardContent.get(0).id;
      text = $cardContent.find('textarea').val();
      data[contentId] = text;
      data.YII_CSRF_TOKEN = YII_CSRF_TOKEN;
      $.ajax({
        'type': 'POST',
        'url': '/OphTrOperationbooking/whiteboard/saveComment/' + whiteboardEventId,
        'data':data,
        'success': function () {
          $cardContent.text(text);
          icon.textContent = 'create';
          window.onbeforeunload = null;
        },
        'error': function () {
          alert('Something went wrong, please try again.');
        }
      });
    }
  });

    var toolTip = new OpenEyes.UI.Tooltip({
        className: 'quicklook',
        offset: {
            x: 10,
            y: 10
        },
        viewPortOffset: {
            x: 0,
            y: 32 // height of sticky footer
        }
    });
    $(this).on('mouseover', '.has-tooltip', function() {
        if ($(this).data('tooltip-content') && $(this).data('tooltip-content').length) {
            toolTip.setContent($(this).data('tooltip-content'));
            var offsets = $(this).offset();
            toolTip.show(offsets.left, offsets.top);
        }
    }).mouseout(function (e) {
        toolTip.hide();
    });


});