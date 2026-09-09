<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function before_action()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->call->view('products/index', [
            'products' => $this->ProductModel->order_by('id', 'DESC'),
        ]);
    }

    public function create()
    {
        $this->call->view('products/form', [
            'heading' => 'Add Product',
            'action' => site_url('products/create'),
            'product' => null,
        ]);
    }

    public function store()
    {
        $data = $this->product_data();
        if ($data['product_name'] === '') {
            $this->call->view('products/form', [
                'heading' => 'Add Product',
                'action' => site_url('products/create'),
                'product' => $data,
                'error' => 'Product name is required.',
            ]);
            return;
        }

        $this->ProductModel->insert($data);
        redirect('products');
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find((int) $id);
        if (!$product) {
            show_404();
        }

        $this->call->view('products/form', [
            'heading' => 'Edit Product',
            'action' => site_url('products/edit/' . (int) $id),
            'product' => $product,
        ]);
    }

    public function update($id)
    {
        $data = $this->product_data();
        if ($data['product_name'] === '') {
            $this->call->view('products/form', [
                'heading' => 'Edit Product',
                'action' => site_url('products/edit/' . (int) $id),
                'product' => $data,
                'error' => 'Product name is required.',
            ]);
            return;
        }

        $this->ProductModel->update((int) $id, $data);
        redirect('products');
    }

    public function delete($id)
    {
        $this->ProductModel->delete((int) $id);
        redirect('products');
    }

    private function product_data()
    {
        return [
            'product_name' => trim((string) $this->request->post('product_name')),
            'description' => trim((string) $this->request->post('description')),
            'price' => (float) $this->request->post('price', 0),
            'quantity' => (int) $this->request->post('quantity', 0),
        ];
    }
}