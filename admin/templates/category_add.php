<!-- form  -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Insert Category</h5>

          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Category Title</label>
                <input required type="text" class="form-control" name="cat_title" />

              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Slug</label>
                <input required type="text" class="form-control" name="slug" />

              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Description</label>
                <textarea required class="form-control" name="description"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Image</label>
                <input required type="file" required class="form-control" name="image" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Title</label>
                <input required type="text" class="form-control" name="meta_title" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Description</label>
                <input required type="text" class="form-control" name="meta_desc" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                <input required type="text" class="form-control" name="meta_keywords" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">status</label>
                <input type="checkbox" name="status" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Popular</label>
                <input type="checkbox" name="popular" />
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>