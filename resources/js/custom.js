$(document).ready(function(){
  // $("button").click(function(){
  //   $("p").slideToggle();
  // });

  console.log('Hello World!');
  $('.topic-btn').click(function(event) {
    $(this).addClass('active');
  openSubtopicTab();
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
  $('.data-table').DataTable();


});

function openSubtopicTab() {
  console.log('Done');
}


function functionName() {

}
