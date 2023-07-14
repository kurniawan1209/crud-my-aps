<?php 
    $title = "";
    $content = "";
    $url = base_url() . "post/create";
    $text = "Create";
    $button = "Save";

    if ($process == "edit"){
        $title = $post["title"];
        $content = $post["content"];
        $url = base_url() . "post/edit/" . $post["idpost"];
        $text = "Edit";
        $button = "Update";
    }
?>

<div id="content" class="p-4 p-md-5 pt-5">

    <div class="row">

        <div class="col-md-12 row mb-2">
            <div class="text-left col-md-6">
                <h4 class="ml-3">
                    Post <?= $text ?>
                </h4>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group ml-3 mt-2 col-md-12">
                            <form action="<?= $url ?>" method="post" class="mr-5">
                                <!-- Title -->
                                <label for="inp-title" class="col-form-label col-md-6">Post Title</label><br>
                                <input type="text" placeholder="Post Title" name="title" id="inp-title" value="<?= $title ?>" class="col-md-12"><br><br>
                                <!-- Content -->
                                <label for="inp-content" class="col-form-label">Post Content</label><br>
                                <textarea name="content" id="inp-content" cols="30" rows="5" placeholder="Post Content" class="col-md-12"><?= $content ?></textarea><br><br>
                                <!-- button save -->
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm"><?= $button ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
