<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-06-22 17:12:39
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   bootstrap.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-07-01 21:58:44
 */

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

