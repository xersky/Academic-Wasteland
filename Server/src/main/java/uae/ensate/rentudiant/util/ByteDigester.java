package uae.ensate.rentudiant.util;

import java.util.Base64;

public class ByteDigester {

    public static String encode(byte[] byteData) {
        return new String(Base64.getEncoder().encode(byteData));
    }

    public static byte[] decode(String str) {
        return Base64.getDecoder().decode(str.getBytes());
    }

}
