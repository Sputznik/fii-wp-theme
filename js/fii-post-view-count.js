jQuery(document).ready(function(){

  var $fii_post_stats = jQuery('[data-behaviour="post-view-stat"]');

  if( $fii_post_stats.length > 0 ){ updatePostViewCount(); }

  function updatePostViewCount(){

    var id = $fii_post_stats.data('id');
    var url = FII_POST_VIEW.ajaxurl;

    jQuery.ajax({
      type:'post',
      url	: url,
      data : {
        action  : 'fii_view_count',
        post_id : id,
        token   : FII_POST_VIEW.token
      }
    });

  }

});
