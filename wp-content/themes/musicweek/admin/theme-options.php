<?php

function wpd_register_admin_scripts()
{
    wp_register_style('wpd-admin', trailingslashit(get_template_directory_uri()) . 'admin/css/admin.css', false, '', 'screen');
    wp_register_style('wpd-colorpicker', trailingslashit(get_template_directory_uri()) . 'admin/js/colorpicker/colorpicker.css', false, '', 'screen');

    wp_register_script('wpd-admin', trailingslashit(get_template_directory_uri()) . 'admin/js/admin.js', array('jquery', 'media-upload', 'thickbox'), '', true);
    wp_register_script('wpd-colorpicker', trailingslashit(get_template_directory_uri()) . 'admin/js/colorpicker/colorpicker.js', array('jquery'), '', true);
}

add_action('admin_init', 'wpd_register_admin_scripts');
/**
 * 加载js文件
 */
function wpd_enqueue_admin_scripts()
{
    wp_enqueue_script('wpd-colorpicker');
    wp_enqueue_script('wpd-admin');
}

add_action('admin_print_scripts', 'wpd_enqueue_admin_scripts');
/**
 * 加载css文件
 */
function wpd_enqueue_admin_styles()
{
    wp_enqueue_style('wpd-colorpicker');
    wp_enqueue_style('wpd-admin');
    wp_enqueue_style('thickbox');
}

add_action('admin_print_styles', 'wpd_enqueue_admin_styles');


class Wpd_General_Settings extends Wpd_Panel
{
    function __construct()
    {
        $this->menu_slug = 'theme-options';

        parent::__construct();
    }

    /**
     *    WordPress后台左侧导航菜单名称以及所在位置
     */
    function add_menu_pages()
    {
        $this->page_hook = add_menu_page(__('主题设置', 'wpd'), __('主题设置', 'wpd'), 'edit_themes', $this->menu_slug, array(&$this, 'menu_page'), '', 61);
    }

    // 设置面板标题
    function add_meta_boxes()
    {
        add_meta_box('mw_admin_welcome', '欢迎信息', array(&$this, 'meta_box'), $this->page_hook, 'normal');
        add_meta_box('mw_admin_static', '静态常量', array(&$this, 'meta_box'), $this->page_hook, 'normal');
        add_meta_box('mw_admin_index', '首页设定', array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-general-text-settings', __('单行文本框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-general-textarea-settings', __('多行文本框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-general-select-settings', __('下拉菜单选项', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-general-checkbox-settings', __('复选框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-general-upload-settings', __('图片上传', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-custom-text-settings', __('自定义文本内容', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-custom-fields-settings', __('自定义字段内容', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
//		add_meta_box( 'wpd-color-settings', __('颜色', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
    }

    // 设置选项开始
    function fields()
    {
        $fields = array( //这一行绝对不可以删除,否则程序出错！
            // 单行文本
            'mw_admin_welcome' => array(
                array(
                    'type' => 'custom',
                    'name' => 'wpd_custom_text',
                    'title' => '模板名称',
                    'desc' => '上音电子音乐周2013专用模板'
                ),
                array(
                    'type' => 'custom',
                    'name' => 'wpd_custom_text',
                    'title' => '程序开发',
                    'desc' => 'chengs&nbsp;(电话:13761633275,QQ:12807733)'
                ),
                array(
                    'type' => 'custom',
                    'name' => 'wpd_custom_text',
                    'title' => '艺术设计',
                    'desc' => 'Leo&nbsp;(QQ:284488526)'
                )
            ),
            'mw_admin_static' => array(
                array(
                    'type' => 'text',
                    'name' => 'mw_weibo_url',
                    'title' => '新浪微博地址',
                    'value' => '',
                    'class' => 'regular-text code'
                ),
            ),
            'mw_admin_index' => array(
                array(
                    'type' => 'text',
                    'name' => 'mw_index_news',
                    'title' => '首页新闻列表',
                    'desc' => '内容为新闻ID，英文逗号分割',
                    'value' => '',
                    'class' => 'regular-text code'
                ),
            ),
            'wpd-general-text-settings' => array(

                array(
                    'type' => 'text',
                    'name' => 'wpd_text',
                    'title' => __('单行文本输入框', 'wpd'),
                    'desc' => __('这里是单行文本输入框的描述内容', 'wpd'),
                )
            ),
            // 下拉菜单选项

            'wpd-general-select-settings' => array(
                array(
                    'type' => 'select',
                    'name' => 'wpd_color_select',
                    'title' => __('下拉菜单选项', 'wpd'),
                    'desc' => __('这里是下拉菜单选项的描述内容.', 'wpd'),
                    'options' => array(
                        'red' => '红色',
                        'black' => '黑色',
                        'gray' => '灰色',
                    ),
                    'value' => '红色'
                )
            ),
            // 复选框

            'wpd-general-checkbox-settings' => array(
                array(
                    'type' => 'checkbox',
                    'name' => 'wpd_checkbox',
                    'value' => false,
                    'title' => __('复选框', 'wpd'),
                    'label' => __('这里是复选框的描述内容', 'wpd')
                )
            ),
            // 上传

            'wpd-general-upload-settings' => array(
                array(
                    'type' => 'upload',
                    'name' => 'wpd_logo_upload',
                    'title' => __('图片上传', 'wpd'),
                    'desc' => __('这里是图片上传的描述内容', 'wpd'),
                    'value' => ''
                )
            ),
            // 自定义字段内容

            'wpd-custom-fields-settings' => array(
                // 腾讯微博
                array(
                    'type' => 'fields',
                    'title' => __('腾讯微博', 'wpd'),
                    'fields' => array(
                        array(
                            'type' => 'checkbox',
                            'name' => 'wpd_social_nav_links[tweibo][status]',
                            'value' => false
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'wpd_social_nav_links[tweibo][url]',
                            'prepend' => __('微博地址:', 'wpd'),
                            'value' => '',
                            'class' => 'regular-text'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'wpd_social_nav_links[tweibo][title]',
                            'prepend' => __('提示文字:', 'wpd'),
                            'value' => '',
                            'class' => 'regular-text'
                        )
                    )
                ),
                // Google +
                array(
                    'type' => 'fields',
                    'title' => __('Google +', 'wpd'),
                    'fields' => array(
                        array(
                            'type' => 'checkbox',
                            'name' => 'wpd_social_nav_links[gplus][status]',
                            'value' => false
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'wpd_social_nav_links[gplus][url]',
                            'prepend' => __('Google + 地址:', 'wpd'),
                            'value' => '',
                            'class' => 'regular-text'
                        ),
                        array(
                            'type' => 'text',
                            'name' => 'wpd_social_nav_links[gplus][title]',
                            'prepend' => __('提示文字:', 'wpd'),
                            'value' => '',
                            'class' => 'regular-text'
                        )
                    )
                )
            ),
            // 自定义文本内容

            'wpd-custom-text-settings' => array(
                array(
                    'type' => 'custom',
                    'name' => 'wpd_custom_text',
                    'title' => __('自定义文本', 'wpd'),
                    'desc' => __('这里是自定义文本的内容。<br>你可以在这个版块写一些帮助文档之类的东东。', 'wpd')
                ),
                array(
                    'type' => 'custom',
                    'name' => 'wpd_custom_text',
                    'title' => __('自定义文本', 'wpd'),
                    'desc' => __('这里是自定义文本的内容。<br>你可以在这个版块写一些帮助文档之类的东东。', 'wpd')
                )
            ),
            // 颜色

            'wpd-color-settings' => array(
                array(
                    'type' => 'color',
                    'name' => 'wpd_bgcolor',
                    'value' => '#fff',
                    'title' => __('背景色', 'wpd'),
                    'append' => __("默认背景色为白色", 'wpd')
                )
            ),

            // 多行文本

            'wpd-general-textarea-settings' => array(
                array(
                    'type' => 'textarea',
                    'name' => 'wpd_textarea',
                    'title' => __('多行文本输入框', 'wpd'),
                    'desc' => __('这里是多行文本输入框的描述内容。', 'wpd')
                )
            )
        );

        return $fields;
    }
}

wpd_register_panel('Wpd_General_Settings');