$(document).ready(function(){
  // $("button").click(function(){
  //   $("p").slideToggle();
  // });

  console.log('Hello World!');
  $('.topic-btn').click(function(event) {
    var table=$(this).addClass('active');
  openSubtopicTab(table);
  });
  // $('.example').wizard();

  // $('.select-all-checkbox').click(function() {
  // var checked= $(this).prop('checked');
  // var targetGroup= $(this).prop('data-target');
  // console.log(checked);
  // $('#'+targetGroup).find('input:checkbox').prop('checked', checked);
  // });

  $('.select-all-checkbox').on('click', function() {
    // $('#'+targetGroup).find('input:checkbox').not(this).prop('checked', this.checked);
    $(this).next('label').text('Select All Topics')

    var targetGroup= $(this).attr('data-target');
    console.log(targetGroup);
    if (this.checked) {
      $(this).next('label').text('Unselect All Topics')
    }
    $('#'+targetGroup).find('input:checkbox').prop('checked', this.checked);
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
