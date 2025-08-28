@if(session('status'))
            <div style="color: green; margin-bottom: 20px; text-align: center; padding: 10px; border: 1px solid green; border-radius: 5px;">
                {{ session('status') }}
            </div>
        @endif