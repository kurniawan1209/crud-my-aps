<div id="content" class="p-4 p-md-5 pt-5">

    <div class="row">
        <div class="col-md-12 row mb-2">
            <div class="text-left col-md-6">
                <h4 class="ml-3">
                    Post Monitoring
                </h4>
            </div>
            <div class="text-right col-md-6">
                <a href="<?= base_url() ?>post/create" class="btn btn-success btn-sm">
                    Add New Post
                </a>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <table class="table table-stripped ml-2 mr-2" width="100%">
                            <thead>
                                <tr class="bg-info">
                                <th class="bg-purple text-center text-white">No</th>
                                    <th class="bg-purple text-center text-white">Title</th>
                                    <th class="bg-purple text-center text-white">Content</th>
                                    <th class="bg-purple text-center text-white">Creation Date</th>
                                    <th class="bg-purple text-center text-white">Creator</th>
                                    <th class="bg-purple text-center text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(empty($posts)){
                                ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Data Not Found</td>
                                    </tr>
                                <?php 
                                    } else {
                                        $counter = 0;
                                        foreach ($posts as $key => $post) {
                                            $counter +=1;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $counter ?></td>
                                        <td class="text-center"><?= $post["title"] ?></td>
                                        <td class="text-center"><?= $post["content"] ?></td>
                                        <td class="text-center"><?= $post["date"] ?></td>
                                        <td class="text-center"><?= $post["username"] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" href="<?= base_url() ?>post/edit/<?= $post['idpost'] ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="<?= base_url() ?>post/delete/<?= $post['idpost'] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
