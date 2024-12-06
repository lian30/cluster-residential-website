document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.getElementById("requests-table-body");
  
    // Fetch requests from the backend
    async function fetchRequests() {
      const response = await fetch("/api/admin/sign-up-requests");
      const data = await response.json();
  
      tableBody.innerHTML = ""; // Clear existing rows
      data.forEach((request) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${request.id}</td>
          <td>${request.name}</td>
          <td>${request.email}</td>
          <td>${request.address}</td>
          <td class="action-buttons">
            <button class="approve" onclick="approveRequest(${request.id})">Approve</button>
            <button class="deny" onclick="denyRequest(${request.id})">Deny</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }
  
    // Approve a request
    async function approveRequest(id) {
      await fetch("/api/admin/approve-request", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id }),
      });
      fetchRequests(); // Refresh table
    }
  
    // Deny a request
    async function denyRequest(id) {
      await fetch("/api/admin/deny-request", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id }),
      });
      fetchRequests(); // Refresh table
    }
  
    // Fetch requests on page load
    fetchRequests();
  });
  