if (typeof PalikaUtils !== 'object') {
  PalikaUtils = new Object();
}
(() => {
  "use strict";
  PalikaUtils.showModal = (id) => {
    $('#' + id).modal('show');
  }

  PalikaUtils.displayImageToDiv = (divId, sourceFile) => {
    var display_id = divId + "_display";
    if (sourceFile.length > 0) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#' + display_id).attr('src', e.target.result);
      }
      reader.readAsDataURL(sourceFile[0]);
    }
  }

  PalikaUtils.ajaxSubmit = (url,type,formData = null) => {
    var result = null;
    $.ajax({
      type: type,
      url: url,
      data: formData,
      async: false,
      success: function(data) {
        result = data;
      }
    });
    return result;
  }

})();