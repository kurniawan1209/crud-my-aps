<?php 
    $username = "";
    $password = "";
    $name = "";
    $role = "";
    $url = base_url() . "account/create";
    $text = "Create";
    $button = "Save";

    if ($process == "edit"){
        $username = $account["username"];
        $password = $account["password"];
        $name = $account["name"];;
        $role = $account["role"];;
        $url = base_url() . "account/edit/" . $account["username"];
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
                                <!-- Username -->
                                <label for="inp-title" class="col-form-label col-md-6">Account Username</label><br>
                                <input type="text" placeholder="Account Username" name="username" id="inp-title" value="<?= $username ?>" class="col-md-12"><br><br>
                                <!-- Password -->
                                <label for="inp-content" class="col-form-label">Account Password</label><br>
                                <input type="password" placeholder="Account Password" name="password" id="inp-title" value="<?= $password ?>" class="col-md-12"><br><br>
                                <!-- Name -->
                                <label for="inp-content" class="col-form-label">Account Name</label><br>
                                <input type="text" placeholder="Account Name" name="name" id="inp-title" value="<?= $name ?>" class="col-md-12"><br><br>
                                <!-- Role -->
                                <label for="inp-content" class="col-form-label">Account Role</label><br>
                                <select name="role">
                                    <option value="author">author</option>
                                    <option value="admin">admin</option>
                                </select>
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
