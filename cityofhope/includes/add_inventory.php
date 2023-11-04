<?php include "../includes/session_check.php" ;?>
<div class="signup-form">
    <form action="inventory_process.php" method="post" id=form>
        <p class="hint-text">Add inventory here</p>
        <div class="form-group">
            <input type="text" class="form-control" name="inventory_name" placeholder="Inventory name"
                required>
        </div>
        <div class="form-group">
            <input class="form-control" name="quantity" type="number" step="1"
                placeholder="Number of inventory you add?" min="1" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="q_description"
                placeholder="Add description about this invetory here"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="register">Add</button>
        </div>
    </form>
</div>