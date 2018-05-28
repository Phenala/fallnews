import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;



public class Main {

    static String chrome = "C:\\Users\\hp\\Documents\\studies\\Jun Sem II\\SE II\\chromedriver_win32\\chromedriver.exe";

    public static void main(String[] args) {

            System.setProperty("webdriver.chrome.driver", chrome);

            //FacebookNotifications fbn = new FacebookNotifications();
            new FallNewsUpdater();
    }
}