<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh mục cha     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('cate-parent.index')); ?>">Danh mục cha</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('cate-parent.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="<?php echo e(route('cate-parent', $detail->slug )); ?>" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?php echo e(route('cate-parent.update')); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
            <div class="box-body">
              <?php if(Session::has('message')): ?>
              <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>
              
               <!-- text input -->
              <div class="form-group">
                <label>Tên danh mục <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($detail->name); ?>">
              </div>
              <div class="form-group">
                <label>Slug <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="slug" id="slug" value="<?php echo e($detail->slug); ?>">
              </div>            
              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="4" name="description" id="description"><?php echo e($detail->description); ?></textarea>
              </div>     
               <div class="form-group" style="margin-top:10px">  
                <label class="col-md-3 row">Ảnh đại diện (560 x 316px)</label>    
                <div class="col-md-9">
                    <img id="thumbnail_image" src="<?php echo e($detail->image_url ? Helper::showImage($detail->image_url ) : URL::asset('public/admin/dist/img/img.png')); ?>" class="img-thumbnail" width="145" height="85">
                    
                    <input type="file" id="file-image" style="display:none" />
                 
                    <button class="btn btn-default btn-sm" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
              </div>      

              <div class="form-group">
                <label>Ẩn/hiện</label>
                <select class="form-control" name="status" id="status">                  
                  <option value="0" <?php echo e($detail->status == 0 ? "selected" : ""); ?>>Ẩn</option>
                  <option value="1" <?php echo e($detail->status == 1 ? "selected" : ""); ?>>Hiện</option>
                </select>
              </div>
            
            </div>         
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('cate-parent.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->     
            <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="meta_id" value="<?php echo e($detail->meta_id); ?>">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo e(!empty((array)$meta) ? $meta->title : ""); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php echo e(!empty((array)$meta) ? $meta->description : ""); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="2" name="meta_keywords" id="meta_keywords"><?php echo e(!empty((array)$meta) ? $meta->keywords : ""); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="2" name="custom_text" id="custom_text"><?php echo e(!empty((array)$meta) ? $meta->custom_text : ""); ?></textarea>
              </div>
              <input type="hidden" name="image_url" id="image_url" value="<?php echo e($detail->image_url); ?>"/>
            
          </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
  var h = screen.height;
var w = screen.width;
var left = (screen.width/2)-((w-300)/2);
var top = (screen.height/2)-((h-100)/2);
function openKCFinder_singleFile() {
      window.KCFinder = {};
      window.KCFinder.callBack = function(url) {
         $('#image_url').val(url);
         $('#thumbnail_image').attr('src', $('#app_url').val() + url);
          window.KCFinder = null;
      };
      window.open('<?php echo e(URL::asset("public/admin/dist/js/kcfinder/browse.php?type=images")); ?>', 'kcfinder_single','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
  }

    $(document).ready(function(){
      
      $('#btnUploadImage').click(function(){        
        //('#file-image').click();
        openKCFinder_singleFile();
      });       
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>