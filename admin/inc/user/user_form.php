<div id="main_content">
    <blockquote>
    	<p>Tambah User</p>
    </blockquote>
    <div class="tambah">
    	<a href="?page=user/user.php">Back</a>
    </div>
    <div class="style_form">
    	<form method="post" action="?page=user/proses.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td>	
                    	<input type="text" name="user" />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>    
                        <input type="password" name="pass" />
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>    
                        <select name="stat">
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>    
                    </td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                        <input type="submit" name="tombol" value="Simpan">
                        <input type="reset" name="tombol" value="Delete">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>