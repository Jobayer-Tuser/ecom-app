<x-app-layout>

    <div x-init="console.log('hello')">

    </div>

@push("script")
    <script type="text/javascript" src="{{ mix('assets/dist/app.js') }}"></script>
    <script type="text/javascript">
        Echo.channel('notification')
            .listen('MessageNotification', (e) => {
                console.log("this is message triggered". e);
            })
    </script>
@endpush
</x-app-layout>
