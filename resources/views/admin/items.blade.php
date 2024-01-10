@foreach ($items as $item)
    <div class="item">
        <img src="{{ $item->image }}" alt="{{ $item->name }}">
        <h3>{{ $item->name }}</h3>
        <p>ID: {{ $item->id }}</p>
        <p>Description: {{ $item->description }}</p>
        <p>Price: {{ $item->price }}</p>
        <button class="delete-image" data-item-id="{{ $item->id }}">Delete Image</button>
        <button class="upload-image" data-item-id="{{ $item->id }}">Upload New Image</button>
        <button class="edit-description" data-item-id="{{ $item->id }}"
            onclick="openPopup('edit-description', {{ $item->id }})">Edit Description</button>
        <button class="edit-price" data-item-id="{{ $item->id }}"
            onclick="openPopup('edit-price', {{ $item->id }})">Edit Price</button>
        <button class="delete-item" data-item-id="{{ $item->id }}">Delete Item</button>
    </div>
@endforeach

<button id="import-csv">Import from CSV</button>

<div id="popup" style="display: none;">
    <input type="text" id="new-value">
    <button onclick="sendValue()">Submit</button>
    <button onclick="cancelPopup()">Cancel</button>
</div>

<script>
    function openPopup(action, itemId) {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('new-value').value = '';
        document.getElementById('new-value').setAttribute('data-action', action);
        document.getElementById('new-value').setAttribute('data-item-id', itemId);
    }

    function cancelPopup() {
        document.getElementById('popup').style.display = 'none';
    }

    function sendValue() {
        var action = document.getElementById('new-value').getAttribute('data-action');
        var itemId = document.getElementById('new-value').getAttribute('data-item-id');
        var newValue = document.getElementById('new-value').value;

        // Send the value to the backend using a form submission
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '/backend/endpoint';

        var inputAction = document.createElement('input');
        inputAction.type = 'hidden';
        inputAction.name = 'action';
        inputAction.value = action;
        form.appendChild(inputAction);

        var inputItemId = document.createElement('input');
        inputItemId.type = 'hidden';
        inputItemId.name = 'item_id';
        inputItemId.value = itemId;
        form.appendChild(inputItemId);

        var inputNewValue = document.createElement('input');
        inputNewValue.type = 'hidden';
        inputNewValue.name = 'new_value';
        inputNewValue.value = newValue;
        form.appendChild(inputNewValue);

        document.body.appendChild(form);
        form.submit();

        // Close the popup
        document.getElementById('popup').style.display = 'none';
    }
</script>
