<?php
if (!$_SESSION["user_session"]) {
    header("Location:" . BASEURL . "auth/login");
}

?>
<!-- <a href="<?= BASEURL ?>auth/Logout">Logout</a> -->

<!-- <?= Flasher::flash() ?> -->

<div class="container-admin">
    <?php
    $this->view('admin/templates/sidebar', $data);
    ?>
    <div id="contentAdmin" class="container-content-admin">
        <header>
            <?php
            $this->view('admin/templates/navbar', $data);
            ?>
        </header>
        <main>
            <div class="container-dashboard">
                <div class="container-user">
                    <div class="header">
                        <div class="title">
                            <h1>Data Semua User</h1>
                        </div>
                        <div class="tambah-user">
                            <a href="<?= BASEURL ?>Admin/formAddUser">Tambah user</a>
                        </div>

                    </div>
                    <div class="container-form">
                        <!-- <div class="filter-controls">
                            <button onclick="filterTable('all')">Show All</button>
                            <label><input type="checkbox" onclick="filterTable('out-of-stock')">Out of Stock</label>
                        </div> -->

                        <label>Role:
                        <select id="roleFilter" class="neon">
                                <option value="all">All</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                        </label>
                        <label>Activasi:
                            <select id="activasiFilter" class="neon">
                                <option value="all">All</option>
                                <option value="active">active</option>
                                <option value="non active">non active</option>
                            </select>
                        </label>

                        <label>Cari user/email:
                            <input type="text" id="userSearch" class="neon">

                        </label>

                        <label>
                            <div class="dropdown">
                                <button class="dropbtn">Sort Direction</button>
                                <div class="dropdown-content">
                                    <a href="#" id="ascOption">Ascending</a>
                                    <a href="#" id="descOption">Descending</a>
                                </div>
                            </div>

                        </label>
                    </div>
                    <table id="myUser">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($data['user'] as $item) {

                        ?>
                            <tr class="table-active">
                                <td><?= $i++; ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <?php
                                if ($item['role_id'] == 1) {
                                    echo '<td>Admin</td>';
                                } elseif ($item['role_id'] == 2) {

                                    echo '<td>user</td>';
                                }
                                ?>
                                <?php if ($item['is_active'] == 1) {
                                    echo '<td>Active</td>';
                                } elseif ($item['is_active'] == 2) {
                                    echo '<td>Non Active</td>';
                                }
                                ?>

                                <td>
                                    <a class="ubah" href="<?= BASEURL . 'Admin/formEditUser/' . $item['id_user'] ?>">Edit</a>
                                    <a class="hapus" href="<?= BASEURL . 'admin/deleteUser/' . $item['id_user'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>


                    <script></script>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
</div>