<x-user-layout>
    <!-- resources/views/weekly-menu.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Menu</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab { cursor: pointer; padding: 10px; background: #eee; display: inline-block; }
        .tab.active { background: #ddd; }
    </style>
</head>
<body>
    <div id="tabs">
        @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
            <div class="tab" data-tab="{{ $day }}">{{ $day }}</div>
        @endforeach
    </div>

    @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
        <div id="{{ $day }}" class="tab-content">
            <h2>{{ $day }}曜日の献立</h2>
            <div>
                <h3>メインメニュー</h3>
                <select name="main_menu">
                    <option>選択式のボックス (main_menuデータベースに保存の物から選択)</option>
                </select>
            </div>
            <div>
                <h3>サブメニュー1</h3>
                <select name="sub_menu_1">
                    <option>選択式のボックス (sub_menuデータベースに保存の物から選択)</option>
                </select>
            </div>
            <div>
                <h3>サブメニュー2</h3>
                <select name="sub_menu_2">
                    <option>選択式のボックス (sub_menuデータベースに保存の物から選択)</option>
                </select>
            </div>
            <button class="keep">Keep</button>
            <button class="random">Random</button>
            <button class="delete">Delete</button>
        </div>
    @endforeach

    <button id="week-random">1week_Random</button>

    <script>
        $(document).ready(function() {
            $('.tab-content:first').addClass('active');
            $('.tab:first').addClass('active');

            $('.tab').click(function() {
                var tab = $(this).data('tab');
                $('.tab-content').removeClass('active');
                $('#' + tab).addClass('active');
                $('.tab').removeClass('active');
                $(this).addClass('active');
            });

            $('.keep').click(function() {
                alert('Keep button clicked');
            });

            $('.random').click(function() {
                alert('Random button clicked');
            });

            $('.delete').click(function() {
                alert('Delete button clicked');
            });

            $('#week-random').click(function() {
                alert('1week Random button clicked');
            });
        });
    </script>
</body>
</html>
</x-user-layout>
