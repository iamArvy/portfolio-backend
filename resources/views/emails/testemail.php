@component('mail::message')
{{ __('You have been invited to join the :team team!') }}

""


@component('mail::button', ['url' => ''])
{{ __('Accept Invitation') }}
@endcomponent

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
