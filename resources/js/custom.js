// require('./sara/saraPackage');


$(document).ready(function(){
  // $("button").click(function(){
  //   $("p").slideToggle();
  // });


  console.log('Hello World!');
  $('.topic-btn').click(function(event) {
    var table=$(this).addClass('active');
    openSubtopicTab(table);
  });

  $('.select-all-checkbox').on('change', function(e) {
    // $(this).next('label').text('Select All Topics')
    var targetGroup= $(this).attr('data-target');
    var $inputs= $('#'+targetGroup).find('input:checkbox');
    // var parentCheckbox=$(this).attr('data-parent');

    if(e.originalEvent === undefined) {
      var allChecked = true;

      $inputs.each(function(){
        allChecked = allChecked && this.checked;
      });
      this.checked = allChecked;

    } else {
      // $(this).next('label').text('Unselect All Topics')
      $inputs.prop('checked', this.checked);
    }
  });


  $('.subtopic-checkbox').on('change', function(){
    $('.select-all-checkbox').trigger('change');
  });

  $('.main-topic-checkbox').on('change', function(){
    // console.log('main changed');
    var checkbox=$(this).attr('data-checkbox');
    // $(checkbox).prop('checked', this.checked);
    // $(checkbox).trigger('change');
    if (!this.checked) {
      // console.log(checkbox);
      $(this).parent().siblings().find('input:checkbox').prop('checked', false);

    }

  });

  $('#table_id').DataTable();
  var table=  $('.data-table').DataTable();
  var table1=  $('#table_id1').DataTable();
  var table2=  $('#table_id2').DataTable();

  // addToSubtopicList(table);

  $('.js-example-basic-multiple').select2();

  $('.data-table tbody').on( 'click', '.btn-add-subTopic', function () {
    table
    .row( $(this).parents('tr') )
    .remove()
    .draw();
  } );


  $(".tst1").click(function(){
    $.toast({
      heading: 'New Package Saved',
      text: 'A new package has been added, please choosed the main topics for the package.',
      position: 'bottom-right',
      loaderBg:'#ff4949',
      icon: 'success',
      hideAfter: 5000,
      stack: 6
    });

  });



  deleteForm();
});

function openSubtopicTab() {
  console.log('Done');
}


function addToSubtopicList(table) {
  $('.btn-add-subTopic').on('click', function(event) {
    console.log('clicked');
    /* Act on the event */
    // var subTopicID= $(this).attr('data-row');
    // $('#'+subTopicID).remove();

    var row = $(this).closest('tr');


    console.log(row);
    console.log(table);
    table.row(row).remove().draw();
  });

}


function deleteForm() {
  $('.dataTable').on('click', 'form.deleteForm', function() {
    $(this).submit(function(event) {

      event.preventDefault();
      swal({
        title: "Are you sure?",
        text: '',
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).unbind('submit').submit()

          // swal("Poof! Your imaginary file has been deleted!", {
          //   icon: "success",
          // });
        }
      });
    });

    // }
  });
}




// function deleteFormHandler() {
//   $(this).submit(function(event) {
//     event.preventDefault();
//     swal({
//       title: "Are you sure?",
//       text: '',
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//         $(this).unbind('submit').submit()
//
//         // swal("Poof! Your imaginary file has been deleted!", {
//         //   icon: "success",
//         // });
//       }
//     });
//
//   });
// }


function sweetAlertConfirm() {

}
