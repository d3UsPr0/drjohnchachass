<?php include "../includes/session_check.php" ;?>
<div class="signup-form">
    <form action="add_drug_process.php" method="post" id=form>
        <p class="hint-text">Add drug here</p>
        <div class="form-group">
            <input type="text" class="form-control" name="d_name" placeholder="Drug name" required="required">
        </div>
        <div class="form-group">
            <input class="form-control" name="quantity" type="number" step="1" placeholder="Number/Quantity you add?"
                min="0">
        </div>
        <div class="form-group">
            <input class="form-control" name="unit" type="number" step="1" placeholder="Unit?" min="1">
        </div>
        <div class="form-group">
            <input class="form-control" name="tsh" type="number" step="1" placeholder="Selling price (Tshs) per unit?"
                min="1">
        </div>
        <div class="form-group">
            <input class="form-control" name="expire" type="date" step="1" placeholder="Expire date" min="1">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="register">Add</button>
        </div>
    </form>
</div>