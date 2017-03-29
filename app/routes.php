<?php
/*
    App Routes
*/

$app->get("/", "APIController:getPersons");

$app->get("/firstname/{name}", "APIController:getPersonFirstName");

$app->get("/lastname/{name}", "APIController:getPersonLastName");

$app->get("/uid/{uid}", "APIController:getPersonUid");