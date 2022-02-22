<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Produtos', 'Listagem de produtos');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Produtos', 'Criar produto');
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Um erro ocorreu enquanto se criava um produto.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produto adicionado com sucesso' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Produtos', 'Editar produtos');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Um erro ocorreu enquanto se atualizava um produto.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produto atualizado com sucesso' ,'success',false, false);
    }

    public function delete($id)
    {
        $product = $this->productRepository->deleteProduct($id);

        if (!$product) {
            return $this->responseRedirectBack('Um erro ocorreu enquanto se excluía um produto', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produto excluíd com sucesso' ,'success',false, false);
    }

}
