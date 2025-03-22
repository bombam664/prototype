<div class="m-3">
<h1>Sign In</h1>
<form action="?module=insertmember">
    <div class="mb-3">
        <label for="firstname" class="form-label">firstname</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
    <label for="membership_type" class="form-label">membership type</label>
        <select class="form-control" id="membership_type" name="membership_type">
            <option selected>Open this select menu</option>
            <option value="1">Student</option>
            <option value="2">Adult</option>
            <option value="3">Senior</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>