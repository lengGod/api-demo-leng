# API Documentation

## Endpoints

1. GET /api/products
   - Description: Get all products
   - Response: Array of product objects

2. POST /api/products
   - Description: Create a new product
   - Request body: { "name": "string", "description": "string", "price": number }
   - Response: Created product object

3. GET /api/products/{id}
   - Description: Get a specific product by ID
   - Response: Product object or 404 error

4. PUT /api/products/{id}
   - Description: Update a specific product
   - Request body: { "name": "string", "description": "string", "price": number }
   - Response: Updated product object or 404 error

5. DELETE /api/products/{id}
   - Description: Delete a specific product
   - Response: Success message or 404 error

6. GET /api/products/search/{name}
   - Description: Search products by name
   - Response: Array of matching product objects

7. GET /api/products/below/{price}
   - Description: Get products below a certain price
   - Response: Array of product objects with price below specified value