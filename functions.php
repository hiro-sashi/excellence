<?php
// _sss option
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');

//css JS 追加
function add_style() {
	//wp_enqueue_style('swiper','//unpkg.com/swiper@6.6.2/swiper-bundle.min.css');
	//wp_enqueue_script('swiper','//unpkg.com/swiper@6.6.2/swiper-bundle.min.js',array());
  wp_enqueue_script('common_script',get_template_directory_uri().'/js/common.js',array('jquery'),'1.0');
	wp_enqueue_style('style',get_stylesheet_uri());
/*
	wp_enqueue_style('common-plus',get_template_directory_uri().'/css/common-plus.css','',date('YmdGi', filemtime( get_template_directory().'/css/common-plus.css' )),'');
	wp_enqueue_script('common-plus',get_template_directory_uri().'/js/common-plus.js',array('jquery'));
*/
}
add_action('wp_enqueue_scripts', 'add_style');

//固定・投稿ページで、画像パスを置き換える
function img_pass_replace($my_post) {
    $content = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/img/', $my_post );
    return $content;
}
add_action('the_content', 'img_pass_replace');

//--------------------head内のjquery.jsをfooterへ移動させる
function custom_enqueue_scripts(){
	if(!is_admin()){ //管理画面以外
	  wp_enqueue_script('jquery');
		remove_action('wp_head', 'wp_print_scripts');
		remove_action('wp_head', 'wp_print_head_scripts', 9);
		remove_action('wp_head', 'wp_enqueue_scripts', 1);
		add_action('wp_footer', 'wp_print_scripts');
		add_action('wp_footer', 'wp_print_head_scripts');
		add_action('wp_footer', 'wp_enqueue_scripts');
	}
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

// generatorを非表示にする
remove_action('wp_head', 'wp_generator');
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// 短縮URLを非表示にする
remove_action('wp_head', 'wp_shortlink_wp_head');
// 絵文字用JS・CSSを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
// 投稿の RSS フィードリンクを非表示にする
remove_action('wp_head', 'feed_links', 2);
// コメントフィードを非表示にする
remove_action('wp_head', 'feed_links_extra', 3);

// WordPressのバージョンが付与されたver=? を非表示にする
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// dns-prefetchを非表示にする
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
function remove_dns_prefetch( $hints, $relation_type ) {
  if ( 'dns-prefetch' === $relation_type ) {
    return array_diff( wp_dependencies_unique_hosts(), $hints );
  }
  return $hints;
}
// wp versionを非表示にする
remove_action('wp_head','rest_output_link_wp_head');
// oEmbedを非表示にする
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//rel="next" rel="prev" を非表示にする
remove_action('wp_head','adjacent_posts_rel_link_wp_head');

//--------------------
remove_action('wp_head', 'rel_canonical');// カノニカル

//authorページにアクセスされたらトップページにリダイレクトする
function theme_slug_redirect_author_archive() {
	if (is_author() ) {
		wp_redirect( home_url());
		exit;
	}
}
add_action( 'template_redirect', 'theme_slug_redirect_author_archive' );

//セルフピンバックの停止
function no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
	if ( 0 === strpos( $link, $home ) )
	unset($links[$l]);
	}
add_action( 'pre_ping', 'no_self_ping' );

//パーマリンク「category」削除

function remcat_function($link) {
return str_replace("/category/", "/", $link);
}
add_filter('user_trailingslashit', 'remcat_function');
function remcat_flush_rules() {
global $wp_rewrite;
$wp_rewrite->flush_rules();
}
add_action('init', 'remcat_flush_rules');
function remcat_rewrite($wp_rewrite) {
$new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'remcat_rewrite');

/*固定ページにカテゴリ追加
add_action( 'init', 'my_add_pages_categories' ) ; 
function my_add_pages_categories()
{
    register_taxonomy_for_object_type( 'category', 'page' ) ;
}
add_action( 'pre_get_posts', 'my_set_page_categories' ) ;
function my_set_page_categories( $query )
{
    if ( $query->is_category== true && $query->is_main_query()){
        $query->set( 'post_type', array( 'post', 'page', 'nav_menu_item' )) ;
    }
}
*/
/* form 
function my_validation_rule( $Validation, $data ) {
	if ( $data[ 'type' ] === '採用応募' ) {
		$Validation->set_rule( 'profession', 'required', array(
			'message' => '必須項目です'
		) );
		$Validation->set_rule( 'current', 'required', array(
			'message' => '必須項目です'
		) );
		$Validation->set_rule( 'graduate', 'required', array(
			'message' => '必須項目です'
		) );
	}
	return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-230', 'my_validation_rule', 10, 2 );

function _my_mwform_value( $value, $name ) {
    if ( $name === 'type' && !empty( $_GET['type'] ) && !is_array( $_GET['type'] ) ) {
        return $_GET['type'];
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-230', '_my_mwform_value', 10, 2 );
*/

/* 使用例：テーマ内の /img/favicon.png を指定
add_filter ( 'get_site_icon_url', 'my_site_icon_url' );
function my_site_icon_url( $url ) {
  return get_theme_file_uri ( 'img/favicon.ico' );
}
*/

/*---ディスクリプション：カスタムフィールド---*/
// カスタムフィールド追加
add_action('admin_menu', 'my_add_custom_fields');
add_action('save_post', 'my_save_custom_fields');
function my_add_custom_fields() {
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'post');
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'page');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'post');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'page');
  add_meta_box( 'my_f03', 'ページ英語タイトル', 'my_page_title_e', 'page');
}
// カスタムフィールドの入力欄表示
function my_keywords() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_keywords',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>キーワードは半角カンマ「,」で区切ります。</p>';
  echo '<input style="width:100%" type="text" name="meta_keywords" value="'.htmlspecialchars($f_data).'" />';
}
function my_description() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_description',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>全角120字以内が望ましいです。</p>';
  echo '<textarea style="width:100%" rows="4" type="text" name="meta_description">'.htmlspecialchars($f_data).'</textarea>';
}
function my_page_title_e() {
  global $post;
  $f_data = get_post_meta($post->ID,'page_title_e',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>ローマ字入力：ページヘッダー部に表示</p>';
  echo '<input type="text" name="page_title_e" value="'.htmlspecialchars($f_data).'" />';
}

// カスタムフィールドの値を保存
function my_save_custom_fields( $post_id ) {
  //nonceによるセキュリティ対策
  $ul_nonce = isset( $_POST['ul_nonce'] ) ? $_POST['ul_nonce'] : null;
  if ( !wp_verify_nonce( $ul_nonce, wp_create_nonce( __FILE__ ) ) ) {
      return $post_id;
  }
//例外処理
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { 
    return $post_id;
  }
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }
//カスタムフィールドのキー一覧
  $keys = array(
    'meta_keywords',
    'meta_description',
    'page_title_e',
  );
  
  //カスタムフィールドの更新
  foreach( $keys as $key ){
    $data = $_POST[$key];
    if ( get_post_meta( $post_id, $key ) == "" ) {
        add_post_meta( $post_id, $key, $data, true );
    } elseif ( $data != get_post_meta( $post_id, $key, true ) ) {
        update_post_meta( $post_id, $key, $data );
    } elseif ( $data == "" ) {
        delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
    }
  }
 
}
//メタキーワード取得
function my_meta_keywords_set(){
    //記事ページ
    if( get_post_meta(get_the_ID(), 'meta_keywords', true) ){
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_keywords', true));
    //その他・共通
    }else{
        echo htmlspecialchars(get_post_meta(get_option( 'page_on_front' ), 'meta_keywords', true));
    }
}
//メタディスクリプション取得
function my_meta_description_set(){
    //記事ページ
    if( get_post_meta(get_the_ID(), 'meta_description', true) ){
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_description', true));
    //その他・共通
    }else{
        echo htmlspecialchars(get_post_meta(get_option( 'page_on_front' ), 'meta_description', true));
    }
}
//ページ英語タイトル取得
function my_page_title_e_set(){
  //記事ページ
  if( get_post_meta(get_the_ID(), 'page_title_e', true) ){
      echo htmlspecialchars(get_post_meta(get_the_ID(), 'page_title_e', true));
  //その他・共通
  }
}

//MW FORM
wp_enqueue_script('yubinbango','https://yubinbango.github.io/yubinbango/yubinbango.js',array(),false,true );
function add_yubinbango_class(){
  echo <<<EOC
    <script>jQuery('.mw_wp_form form').addClass('h-adr');</script>
  EOC;
}
add_action( 'wp_print_footer_scripts', 'add_yubinbango_class' );