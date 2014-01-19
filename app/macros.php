<?php
HTML::macro('col', function($row, $offset = null){
  $class = "col-xs-$row col-sm-$row col-md-$row col-lg-$row";
  if(!is_null($offset) && is_int($offset))
    $class .= " col-xs-offset-$offset col-sm-offset-$offset col-md-offset-$offset col-lg-offset-$offset";
  return '<div class="'. $class .'">';
  });

HTML::macro('end_col', function(){
    return '</div>';
});



Form::macro('bt_text', function($name, $value = null, $options = array()){

    if(isset($options['class']))
        $options['class'] .= ' form-control';
    else
        $options['class'] = 'form-control';

    return Form::text($name, $value, $options);
});

 ?>
