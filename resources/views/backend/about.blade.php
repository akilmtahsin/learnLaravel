<form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 550px; margin: 4px auto; background-color: #f2f2f2; padding: 20px 10px; border-radius: 5px;">
  @csrf

  <div style="margin-bottom: 10px;">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Enter name" required style="width: 100%;">
  </div>
  <div style="margin-bottom: 10px;">
    <label for="description">Description</label>
    <textarea name="description" id="description" rows="10" style="width: 100%;"></textarea>
  </div>
  <div style="margin-bottom: 10px;">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" required style="width: 100%;">
  </div>
  <div style="margin-bottom: 10px;">
    <label for="status">Status</label>
    <select name="status" id="status" style="width: 100%;">
      <option value="1">Active</option>
      <option value="0">Inactive</option>
    </select>
  </div>
  <br> <br>
  <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Submit</button>
</form>