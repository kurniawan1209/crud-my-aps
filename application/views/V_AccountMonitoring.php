<div id="content" class="p-4 p-md-5 pt-5">

    <div class="row">
        <div class="col-md-12 row mb-2">
            <div class="text-left col-md-6">
                <h4 class="ml-3">
                    Account Monitoring
                </h4>
            </div>
            <div class="text-right col-md-6">
                <a href="<?= base_url() ?>account/create" class="btn btn-success btn-sm">
                    Add New Account
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
                                    <th class="bg-purple text-center text-white">Username</th>
                                    <th class="bg-purple text-center text-white">Password</th>
                                    <th class="bg-purple text-center text-white">Name</th>
                                    <th class="bg-purple text-center text-white">Role</th>
                                    <th class="bg-purple text-center text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(empty($accounts)){
                                ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Data Not Found</td>
                                    </tr>
                                <?php 
                                } else {
                                    $counter = 0;
                                    foreach ($accounts as $key => $account) {
                                        $counter += 1;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $counter ?></td>
                                        <td class="text-center"><?= $account["username"] ?></td>
                                        <td class="text-center">*****************</td>
                                        <td class="text-center"><?= $account["name"] ?></td>
                                        <td class="text-center"><?= $account["role"] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" href="<?= base_url() ?>account/edit/<?= $account['username'] ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="<?= base_url() ?>account/delete/<?= $account['username'] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
