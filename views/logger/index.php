<?php \yii\widgets\ActiveForm::begin() ?>
    <textarea name="message"></textarea>
    <select name="type">
        <?php
            foreach ($loggerTypes as $k => $type) {
                $selected = $k === $loggerDefaultType ? ' selected' : '';
                echo "<option value='{$k}'{$selected}>Send to {$type}</option>";
            }
        ?>
    </select>
    <button type="submit">send</button>
<?php \yii\widgets\ActiveForm::end() ?>
