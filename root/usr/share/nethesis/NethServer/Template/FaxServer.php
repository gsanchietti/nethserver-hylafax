<?php

echo $view->header()->setAttribute('template', $T('FaxServer_Title'));
$general = $view->panel()
    ->setAttribute('title', $T('FaxServer_General_Title'))
    ->insert($view->textInput('CountryCode'))
    ->insert($view->textInput('AreaCode'))
    ->insert($view->textInput('FaxNumber'))
    ->insert($view->textInput('FaxName'))
;
$modem = $view->panel()
    ->setAttribute('title', $T('FaxServer_Modem_Title'))
    ->insert($view->selector('FaxDevice', $view::SELECTOR_DROPDOWN))
    ->insert($view->selector('Mode', $view::SELECTOR_DROPDOWN))
    ->insert($view->checkbox('WaitDialTone','enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->textInput('PBXPrefix'))
;
$notification = $view->panel()
    ->setAttribute('title', $T('FaxServer_Notification_Title'))
    #->insert($view->textInput('SendTo'))
    ->insert($view->selector('SendTo', $view::SELECTOR_DROPDOWN))
    ->insert($view->textLabel('DispatchFileType')->setAttribute('template', $T('DispatchFileType_label')))
    ->insert($view->checkbox('DispatchFileTypePDF','pdf')->setAttribute('uncheckedValue', ''))
    ->insert($view->checkbox('DispatchFileTypePS','ps')->setAttribute('uncheckedValue', ''))
    ->insert($view->checkbox('DispatchFileTypeTIF','tif')->setAttribute('uncheckedValue', ''))
    ->insert($view->textInput('NotifyFileType'))
;

$extra = $view->panel()
    ->setAttribute('title', $T('FaxServer_Extras_Title'))
    ->insert($view->checkbox('ClientShowReceived','enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->fieldsetSwitch('PrinteReceived', 'enabled', $view::FIELDSETSWITCH_CHECKBOX | $view::FIELDSETSWITCH_EXPANDABLE)
    ->setAttribute('uncheckedValue', 'disabled')
    ->insert($view->selector('PrinterName', $view::SELECTOR_DROPDOWN)))
    ->insert($view->checkbox('SambaFax','enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->checkbox('SendReport','enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->checkbox('SummaryReport','enabled')->setAttribute('uncheckedValue', 'disabled'))
;

$tabs = $view->tabs()
    ->insert($general)
    ->insert($modem)
    ->insert($notification)
    ->insert($extra)
;

echo $tabs;

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
