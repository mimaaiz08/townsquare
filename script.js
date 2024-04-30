document.addEventListener('DOMContentLoaded', function() {
    const homeLink = document.getElementById('home-link');
    const pollsLink = document.getElementById('polls-link');
    const suggestionsLink = document.getElementById('suggestions-link');
    const feedbackLink = document.getElementById('feedback-link');
    const mainContent = document.getElementById('main-content');
    const chatbotButton = document.getElementById('chatbot-button');
  
    homeLink.addEventListener('click', function(event) {
      event.preventDefault();
      mainContent.innerHTML = '<h2>Home Page</h2><p>Welcome to the home page!</p>';
    });
  
    pollsLink.addEventListener('click', function(event) {
      event.preventDefault();
      mainContent.innerHTML = '<h2>Community Polls</h2><p>List of active polls will be displayed here.</p>';
    });
  
    suggestionsLink.addEventListener('click', function(event) {
      event.preventDefault();
      mainContent.innerHTML = '<h2>Suggestions</h2><p>Submit your suggestions here.</p>';
    });
  
    feedbackLink.addEventListener('click', function(event) {
      event.preventDefault();
      mainContent.innerHTML = '<h2>Feedback</h2><p>Provide your feedback here.</p>';
    });
  
    chatbotButton.addEventListener('click', function() {
      // Open the chatbot or trigger chatbot functionality
      // You can implement this according to your chatbot service
      alert('Chatbot functionality will be triggered here.');
    });
  });
  