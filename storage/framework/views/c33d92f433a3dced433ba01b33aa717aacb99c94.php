<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>           

            <li ><a href="<?php echo e(route('cate-parent', [$parentDetail->slug])); ?>"><?php echo $parentDetail->name; ?></a></li>
            <li class="active"><?php echo $cateDetail->name; ?></li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
    <div class="row">
        <div class="col-sm-9 col-xs-12 block-col-left">
            <div class="block-page-common clearfix">
                <div class="block block-title">
                    <h2>
                        <i class="fa fa-product-hunt"></i>
                        <?php echo $cateDetail->name; ?>

                    </h2>
                </div>
                <div class="block-content">
                    <div class="product-list">
                        <div class="row">
                          <?php foreach($productList as $product): ?>
                            <div class="col-sm-3 col-xs-6">
                                <div class="product-item">
                                    <div class="product-img">
                                       <a href="<?php echo e(route('product-detail', [$product->slug])); ?>" title="<?php echo $product->name; ?>">
                                           <img class="lazy" src="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('public/admin/dist/img/no-image.jpg')); ?>" alt="<?php echo $product->name; ?>" title="<?php echo $product->name; ?>">           
                                        </a>
                                      </div>
                                    <div class="product-info">
                                         <h2 class="title">
                                   <a href="<?php echo e(route('product-detail', [$product->slug])); ?>" title="<?php echo $product->name; ?>"><?php echo $product->name; ?></a></h2>
                                        <div class="product-price">
                                            <span class="price-new"><?php echo e($product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price)); ?>đ</span>
                                  <?php if($product->is_sale): ?>
                                  <span class="price-old"><?php echo e(number_format($product->price)); ?>đ</span>
                                  <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <?php endforeach; ?>
                        </div>
                        <nav class="block-pagination">
                            <?php echo e($productList->links()); ?>

                        </nav><!-- /block-pagination -->
                    </div>
                </div>
            </div><!-- /block-ct-news -->
        </div><!-- /block-col-left -->
        <div class="col-sm-3 col-xs-12 block-col-right">
           <?php echo $__env->make('frontend.partials.km-hot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div><!-- /block-col-right -->
    </div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>