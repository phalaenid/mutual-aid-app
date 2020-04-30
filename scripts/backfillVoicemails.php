<?php
require_once '../vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = '<REDACTED>';
$token = '<REDACTED>';
$twilio = new Client($sid, $token);

print("starting script \n");

$calls = $twilio->calls
    ->read([
        "DateCreatedAfter" => "2020-04-22T18:45:00+0000"
    ], 800); // TODO(norahayes): remove limit once we're done testing

print("found " . count($calls) . " calls \n");

// fetch calls after April 22, 2020 @ 2:45pm EDT, which
// is the timestamp of the last call prior to the bug
$backfill_start_date = DateTimeImmutable::createFromFormat('U',1587581160);

// 4/25/2020 @ 11:35am EDT, when the bug was fixed
$backfill_end_date = DateTimeImmutable::createFromFormat('U',1587829500);

$sids = [];
foreach ($calls as $record) {
    if ($record->dateCreated > $backfill_start_date && $record->dateCreated < $backfill_end_date) {
        $sids[] = $record->sid;
        // TODO(norahayes): how do I get the type of url we put into airtable?
        //  & how to I get the person's phone number?
    }
}

print("counted " . count($sids) . " calls after processing \n");
