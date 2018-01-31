<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller
{

    public function index()
    {

    }

    // 添加文章
    public function add_article()
    {
        $this->load->helper('form');
        $this->load->model('category_model', 'cate');
        $data_cate['category_list'] = $this->cate->check_category_model();
        $this->load->view('admin/add_article.html', $data_cate);
    }

    // 载入辅助的发表文章验证类
    public function send_article()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '文章标题', 'required|min_length[5]');
        $this->form_validation->set_rules('cat_id', '类型', 'required');
        $this->form_validation->set_rules('content', '文章内容', 'required|min_length[5]');
        $this->form_validation->set_rules('description', '文章描述', 'required|max_length[255]');
        $status = $this->form_validation->run();
        if ($status) {
            //插入文章
            $this->load->model('article_model', 'article');
            $data = array(
                'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content'),
                'cat_id'    => $this->input->post('cat_id'),
                'type'      => $this->input->post('cat_id'),
                'keywords'  => $this->input->post('keywords'),
                'description' => $this->input->post('description'),
                'thumb'     => $this->input->post('thumb')
            );
            $this->article->add_article($data);
            success('admin/article/add_article', '添加成功');
        } else {
            $error_msg = validation_errors();
            $error_msg = str_replace(PHP_EOL, '', $error_msg);
            error($error_msg);
        }
    }

    // 文章列表
    public function article_list()
    {
        // 查看 文章列表
        $this->load->model('article_model', 'article');
        $article_list = $this->article->model_check_article();
        $this->load->model('category_model', 'cate');
        foreach($article_list as $k=>$v){
            $where = array(
                'id' => $v['cat_id'],
            );
            $cate_info = $this->cate->model_check_category_where($where);

            $article_list[$k]['cate_name'] = $cate_info[0]['cate_name'];
        }
        $data_article['article_list']=$article_list;
        $data_article['links'] = $this->article->page_links();
        // 载入模板，分配数据
        $this->load->view('admin/article_list.html', $data_article);
    }

    // 编辑文章
    public function edit_article(){
        $aid = $this->uri->segment(4);
        //需要根据ID查询结果，然后赋值到下一个html中
        $article_data = array(
            'id' => $aid
        );
        $this->load->model('article_model', 'article');
        $article_return['article_list'] = $this->article->model_check_article_where($article_data);
        $this->load->model('category_model', 'cate');

        $article_return['category_list'] = $this->cate->check_category_model();

        //var_dump($article_return);exit;
        $this->load->view('admin/edit_article.html', $article_return);// 载入编辑文章的view
    }

    // 删除文章
    public function del_article($id){
        $this->load->model('article_model', 'article');
        $this->article->del_article($id);
        success('admin/article/article_list', '删除成功');
    }

}