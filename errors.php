<?php if (count($errors)>0):?>
    <div class="error">
        <?php foreach ($errors as $error):?>
            <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php if (count($errors1)>0):?>
    <div class="error">
        <?php foreach ($errors1 as $error):?>
            <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

