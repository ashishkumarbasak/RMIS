
<?php if (!empty($validation_errors)) { ?>		 
    <div class="alert alert-error">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <?php        
        foreach ($validation_errors as $error) {
            echo " - " . $error . "<br/>";
        }
        ?>               
    </div>
<?php } ?>

<?php if ($this->messages->count("error") > 0) { ?>		 
    <div class="alert alert-error">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <?php
        $errors = $this->messages->get("error");
        foreach ($errors as $error) {
            echo " - " . $error . "<br/>";
        }
        ?>               
    </div>

    <?php
} if ($this->messages->count("success") > 0) {
    ?>	
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <?php
        $success = $this->messages->get("success");
        foreach ($success as $suc) {
            echo " - " . $suc . "<br/>";
        }
        ?>
    </div>			
    <?php
} if ($this->messages->count("message") > 0) {
    ?>	
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <?php
        $messages = $this->messages->get("message");
        foreach ($messages as $message) {
            echo " - " . $message . "<br/>";
        }
        ?>
    </div>			
<?php } ?>
        