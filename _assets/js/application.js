//= require vendor/tether
//= require vendor/bootstrap.min
//= require vendor/ie10-viewport-bug-workaround
//= require vendor/waves


// Change names of Portfolio tabs

function changeIt(item) {

  //console.log(item);

  if ( item === 'process' )
  {
    $('.laquo').text('See Designs');
    $('.raquo').text('Viewing Process');
  }
  if ( item === "design" )
  {
    $('.laquo').text('Viewing Designs');
    $('.raquo').text('See Process');
  }
}
