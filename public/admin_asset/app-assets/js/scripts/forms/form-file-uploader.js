/*=========================================================================================
    File Name: form-file-uploader.js
    Description: dropzone
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
Dropzone.autoDiscover = false;

$(function () {
  'use strict';

  var singleFile = $('#dpz-single-file');
  var multipleFiles = $('#dpz-multiple-files');
  var buttonSelect = $('#dpz-btn-select-files');
  var limitFiles = $('#dpz-file-limits');
  var acceptFiles = $('#dpz-accept-files');
  var removeThumb = $('#dpz-remove-thumb');
  var removeAllThumbs = $('#dpz-remove-all-thumb');

  // Basic example
  singleFile.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFiles: 1
  });

  // Multiple Files
  multipleFiles.dropzone({
      paramName: 'files', // The name that will be used to transfer the file
      maxFilesize: 200, // MB
      clickable: true,
      addRemoveLinks: true,
      dictRemoveFile: ' Trash'
  });

  // Use Button To Select Files
  buttonSelect.dropzone({
    clickable: '#select-files' // Define the element that should be used as click trigger to select files.
  });

  // Limit File Size and No. Of Files
  limitFiles.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 0.5, // MB
    maxFiles: 5,
    maxThumbnailFilesize: 1 // MB
  });

  // Accepted Only Files
  acceptFiles.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    acceptedFiles: 'image/*'
  });

  //Remove Thumbnail
  removeThumb.dropzone({
    url: '/',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    paramName: 'files', // The name that will be used to transfer the file
    maxFilesize: 200, // MB
    addRemoveLinks: true,
    dictRemoveFile: ' Trash',
      init: function (){
          let myDropzone;
          myDropzone = this
          this.on('addedfiles', function (files){
              var minSteps = 6,
                  maxSteps = 60,
                  timeBetweenSteps = 100,
                  bytesPerStep = 100000;
              for (var i = 0; i < files.length; i++) {

                  var file = files[i];
                  let totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                  for (var step = 0; step < totalSteps; step++) {
                      var duration = timeBetweenSteps * (step + 1);
                      setTimeout(function(file, totalSteps, step) {
                          return function() {
                              file.upload = {
                                  progress: 100 * (step + 1) / totalSteps,
                                  total: file.size,
                                  bytesSent: (step + 1) * file.size / totalSteps
                              };
                              myDropzone.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                              if (file.upload.progress == 100) {
                                  file.status = Dropzone.SUCCESS;
                                  myDropzone.emit("success", file, 'success', null);
                                  myDropzone.emit("complete", file);
                              }
                          };
                      }(file, totalSteps, step), duration);
                  }
              }
          })
          if (typeof  dataImgs != 'undefined'){
              $.each(dataImgs, function (key, value){
                  var mockFile = {name: value.name, size: value.size, id: value.id}
                  myDropzone.files.push(mockFile)
                  myDropzone.emit("addedfile", mockFile);
                  myDropzone.emit("thumbnail", mockFile, value.path);
                  myDropzone.emit("complete", mockFile);
              })
          }
      }
  });

  // Remove All Thumbnails
  removeAllThumbs.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    init: function () {
      // Using a closure.
      var _this = this;

      // Setup the observer for the button.
      $('#clear-dropzone').on('click', function () {
        // Using "_this" here, because "this" doesn't point to the dropzone anymore
        _this.removeAllFiles();
        // If you want to cancel uploads as well, you
        // could also call _this.removeAllFiles(true);
      });
    }
  });
});
