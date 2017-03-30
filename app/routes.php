<?php
/*
    App Routes
*/

$app->get("/", "APIController:getWelcome");

$app->get("/persons", "APIController:getPersons");

$app->get("/firstname/{name}", "APIController:getPersonFirstName");

$app->get("/lastname/{name}", "APIController:getPersonLastName");

$app->get("/uid/{uid}", "APIController:getPersonUid");