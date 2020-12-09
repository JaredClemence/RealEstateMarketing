<x-html-email :mail-id='$mail_id' medallion-type='4' testing='{{$testing}}'>
    <x-email.paragraph-text>Dear {{$agentName}}:</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>We have a new lead looking into <strong>{{$address}} in {{$city}}, {{$state}} {{$zip}}</strong>. The lead received a copy of the brochure 15 minutes ago and is likely ready to receive a follow-up phone call.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Please note that this lead is sent to you as part of our oral referral agreement, which is that you agree to call the lead and pay 25% referral fee to Jared Clemence, in exchange, I transfer the lead to you and agree not to follow up.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>The information below has been provided by the user, so I cannot be certain that it is 100% correct. If you do not wish to work this lead, please let me know as soon as possible so that I may follow up accordingly.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text><strong>
        Lead Name: {{$name}}<br/>
Lead Phone: {{$phone}}<br/>
Lead Email: {{$email}}</strong>
    </x-email.paragraph-text><x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Sincerely,</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Jared Clemence, DRE#02087736</x-email.paragraph-text>
    <x-email.paragraph-text>Agent of Watson Realty, DRE#00782354</x-email.paragraph-text>
    <x-email.paragraph-text>610-360-9558 / jaredclemence@gmail.com</x-email.paragraph-text>
</x-html-email>
